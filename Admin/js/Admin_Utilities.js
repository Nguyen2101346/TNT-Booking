document.getElementById('addButton').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'flex';
});

document.getElementById('cancelButton').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

document.getElementById('confirmButton').addEventListener('click', function() {
    var itemName = document.getElementById('itemName').value;
    if (itemName.trim() !== '') {
        var item = document.createElement('div');
        item.className = 'item';
        item.innerHTML = '<span>' + itemName + '</span><button class="remove-button">✖</button>';
        document.querySelector('.items').appendChild(item);

        // Add event listener to the new remove button
        item.querySelector('.remove-button').addEventListener('click', function() {
            item.remove();
        });
    }
    document.getElementById('modal').style.display = 'none';
    document.getElementById('itemName').value = '';
});

// Add event listeners to existing remove buttons
document.querySelectorAll('.remove-button').forEach(function(button) {
    button.addEventListener('click', function() {
        button.parentElement.remove();
    });
});
