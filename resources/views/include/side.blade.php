<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/ccs/bootstrap.mic.ccs">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
            <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">CL</span> <span
                    class="text-white">Album Station</span></h1>
                    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
                          </svg>
                    </button>                   
        </div>

        <ul class="list-unstyled px-2">
            <li class="active"><a href="{{ url('/home') }}" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fal fa-home"></i> Dashboard</a></li>
            <li class=""><a href="{{ url('/users') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-list"></i>
                    Projects</a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                    <span><i class="fal fa-comment"></i> Messages</span>
                    <span class="bg-dark rounded-pill text-white py-0 px-2">02</span>
                </a>
            </li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                        class="fal fa-envelope-open-text"></i> Services</a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-users"></i>
                    Customers</a></li>
        </ul>
        <hr class="h-color mx-2">

        <ul class="list-unstyled px-2">
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bars"></i>
                    Settings</a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-bell"></i>
                    Notifications</a></li>

        </ul>
    </div>


    <div class="content">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                 <button class="btn px-1 py-0 open-btn me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/>
                    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/>
                    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
                  </svg></button>
                    <a class="navbar-brand fs-4" href="#"><span class="bg-dark rounded px-2 py-0 text-white">CL</span></a>
                   
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                      </svg>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Profile</a>
                        </li>
    
                    </ul>
    
                </div>
            </div>
        </nav>
    

<script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap/.bundle.min.js"></script>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script> $(".sidebar ul li").on('click', function () {
    $(".sidebar ul li.active").removeClass('active');
    $(this).addClass('active');
});

$('.open-btn').on('click', function () {
    $('.sidebar').addClass('active');

});


$('.close-btn').on('click', function () {
    $('.sidebar').removeClass('active');

})</script>

<style>#side_nav{
    background: #000;
    min-width: 250px;
    max-width: 250px;
    transition: all 0.3s;
   }
   .content{
      min-height: 100vh;
      width: 100%;
   }
   hr.h-color{
     background: #eee;
   }
   
   .sidebar li.active{
      background: #eee;
      border-radius: 8px;
   }
   
   .sidebar li.active a, .sidebar li.active a:hover {
    color: #000;
   }
   .sidebar li a{
    color: #fff;
   }
   
   @media(max-width: 767px){
    #side_nav{
      margin-left: -250px;
      position: absolute;
      min-height: 100vh;
      z-index: 1;
   
    }
    #side_nav.active{
      margin-left: 0;
     }
   }
   
   </style>
