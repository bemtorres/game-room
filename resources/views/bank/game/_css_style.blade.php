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
