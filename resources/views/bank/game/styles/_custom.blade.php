<style>
  body {
    background: #d9dbe0 !important;
  }

  .cursor {
    cursor: pointer;
  }

  .my-custom-scrollbar {
    position: relative;
    height: {{ $isMobile ? '240px' : '340px' }};
    overflow: auto;
  }


  .my-custom-scrollbar-img {
    position: relative;
    height: 120px;
    overflow: auto;
  }

  .table-wrapper-scroll-y {
    display: block;
  }

  .navbar_down {
    overflow: hidden;
    /* background-color: #333; */
    position: fixed; /* Set the navbar to fixed position */
    /* top: 0; Position the navbar at the top of the page */
    bottom: 0;
    width: 100%; /* Full width */
  }

  .col img{
    height:100px;
    width: 100%;
    cursor: pointer;
    transition: transform 1s;
    object-fit: cover;
  }
  .col label{
    overflow: hidden;
    position: relative;
  }
  .imgbgchk:checked + label>.tick_container{
    opacity: 1;
  }
  /*         aNIMATION */
  .imgbgchk:checked + label>img{
    transform: scale(1.25);
    opacity: 0.3;
  }
  .tick_container {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    cursor: pointer;
    text-align: center;
  }
  .tick {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    padding: 6px 12px;
    height: 40px;
    width: 40px;
    border-radius: 100%;
  }
</style>
{{-- CUSTOMER PROGRAMABLE --}}
<style>
  .border-primary {
    border-color: {{ $user_room->getColor() }} !important;
  }

  .btn-primary {
    background: {{ $user_room->getColor() }} !important;
    border-color: {{ $user_room->getColor() }} !important;
  }

  .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    /* color: #000; */
    background-color: {{ $user_room->getColor() }};
  }

  .nav-link {
    color: {{ $user_room->getColor() }};
  }

  .text-primary {
    color: {{ $user_room->getColor() }} !important;
  }
</style>
