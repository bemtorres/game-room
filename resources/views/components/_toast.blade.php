<script>
  iziToast.settings({
    timeout: 3000,
    resetOnHover: true,
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
    position: 'topRight',
    messageColor: 'white',
  });
</script>
@if (session('success'))
<script>
  iziToast.success({
    backgroundColor: '#47c363',
    message: "{{ session('success') }}"
  });
</script>
@endif
@if (session('danger'))
<script>
  iziToast.error({
    timeout: 0,
    backgroundColor: '#fc544b',
    message: "{{ session('danger') }}"
  });
</script>
@endif
@if (session('warning'))
<script>
  iziToast.warning({
    backgroundColor: '#ffa426',
    message: "{{ session('warning') }}"
  });
</script>
@endif
@if (session('info'))
<script>
  iziToast.info({
    backgroundColor: '#3abaf4',
    message: "{{ session('info') }}"
  });
</script>
@endif
