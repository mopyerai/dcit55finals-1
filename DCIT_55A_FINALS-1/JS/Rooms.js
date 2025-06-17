document.addEventListener("DOMContentLoaded", function () {
  fetch("../PHP/Rooms.php")
    .then(response => response.json())
    .then(rooms => {
      const container = document.getElementById("rooms-grid");
      container.innerHTML = "";

      rooms.forEach(room => {
        const available = room.availability ? "Available" : "Unavailable";
        const statusClass = room.availability ? "available-dot" : "unavailable-dot";
        const card = `
          <article class="room-card">
            <h2 class="room-title">${room.room_name}</h2>
            <p class="room-info">${room.bed_info} • ${room.view_info} • ${room.guest_capacity} Guest(s)</p>
            <img src="${room.image_path}" class="room-image" />
            <div class="room-meta">
              <span class="room-price">$${room.price_per_night} / night</span>
              <span class="availability">
                <span class="${statusClass}"></span> ${available}
              </span>
            </div>
            <button class="book-now-btn" type="button">Book Now</button>
          </article>
        `;
        container.innerHTML += card;
      });
    });
});
