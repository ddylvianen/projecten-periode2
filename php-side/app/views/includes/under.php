<script src="https://kit.fontawesome.com/03deb1591a.js" crossorigin="anonymous"></script>
<script>
  const socket = new WebSocket("ws://localhost:35729");
  socket.onmessage = (event) => {
    if (event.data === "reload") {
      console.log("Bestanden gewijzigd - herlaad pagina...");
      location.reload();
    }
  };
</script>
</body>
</html>