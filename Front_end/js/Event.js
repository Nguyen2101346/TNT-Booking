function loadMeetingContent() {
    // Lấy nội dung từ div ẩn chứa nội dung Meeting
    const meetingContent = $('#hiddenMeetingContent').html();
    $('#content').html(meetingContent);
    const meetingForm = $('#hiddenMeetingForm').html();
    $('#Request_Form').html(meetingForm);
    const meetingSlide = $('#MeetingSlide').html();
    $('#Request_Slide').html(meetingSlide);

    const CommunityCard = document.querySelector('.EventCard.community');
    const WeddingCard = document.querySelector('.EventCard.wedding');
    const MeetingCard = document.querySelector('.EventCard.meeting');
    MeetingCard.addEventListener('click',() =>{
         MeetingCard.classList.add('click');
         WeddingCard.classList.remove('click');
         CommunityCard.classList.remove('click');
    })

    const Requestcontainer = document.querySelector('.Request_container');
    const RequestBtn = document.querySelector('.request_btn');
    const ExitBtn = document.querySelector('.exit_btn')
    let visible = false;
    RequestBtn.addEventListener('click',() => {
              Requestcontainer.classList.add('visible');
              visible = true;
         });
    ExitBtn.addEventListener('click',() => { 
              Requestcontainer.classList.remove('visible');
              visible = false;
    });
}
function loadWeddingContent() {
    // Lấy nội dung từ div ẩn chứa nội dung Wedding
    const weddingContent = $('#hiddenWeddingContent').html();
    $('#content').html(weddingContent);
    const weddingForm = $('#hiddenWeddingForm').html();
    $('#Request_Form').html(weddingForm)
    const weddingSlide = $('#WeddingSlide').html();
    $('#Request_Slide').html(weddingSlide);

    const MeetingCard = document.querySelector('.EventCard.meeting');
    const WeddingCard = document.querySelector('.EventCard.wedding');
    const CommunityCard = document.querySelector('.EventCard.community');
    WeddingCard.addEventListener('click',() =>{
         MeetingCard.classList.remove('click');
         WeddingCard.classList.add('click');
         CommunityCard.classList.remove('click');
    })

    const Requestcontainer = document.querySelector('.Request_container');
    const RequestBtn = document.querySelector('.request_btn');
    const ExitBtn = document.querySelector('.exit_btn')
    let visible = false;
    RequestBtn.addEventListener('click',() => {
              Requestcontainer.classList.add('visible');
              visible = true;
         });
    ExitBtn.addEventListener('click',() => { 
              Requestcontainer.classList.remove('visible');
              visible = false;
    });
}

function loadCommunityContent() {
    // Lấy nội dung từ div ẩn chứa nội dung Community
    const communityContent = $('#hiddenCommunityContent').html();
    $('#content').html(communityContent);
    const communityForm = $('#hiddenCommunityForm').html();
    $('#Request_Form').html(communityForm)

    const MeetingCard = document.querySelector('.EventCard.meeting');
    const WeddingCard = document.querySelector('.EventCard.wedding');
    const CommunityCard = document.querySelector('.EventCard.community');
    CommunityCard.addEventListener('click',() =>{
         MeetingCard.classList.remove('click');
         WeddingCard.classList.remove('click');
         CommunityCard.classList.add('click');
    })

    const Requestcontainer = document.querySelector('.Request_container');
    const RequestBtn = document.querySelector('.request_btn');
    const ExitBtn = document.querySelector('.exit_btn')
    let visible = false;
    RequestBtn.addEventListener('click',() => {
              Requestcontainer.classList.add('visible');
              visible = true;
         });
    ExitBtn.addEventListener('click',() => { 
              Requestcontainer.classList.remove('visible');
              visible = false;
    });
}

const Requestcontainer = document.querySelector('.Request_container');
const RequestBtn = document.querySelector('.request_btn');
const ExitBtn = document.querySelector('.exit_btn')
let visible = false;
RequestBtn.addEventListener('click',() => {
         Requestcontainer.classList.add('visible');
         visible = true;
    });
ExitBtn.addEventListener('click',() => { 
         Requestcontainer.classList.remove('visible');
         visible = false;
});