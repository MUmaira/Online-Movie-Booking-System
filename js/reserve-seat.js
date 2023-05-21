const allSeats = document.querySelector(".allseats");
//selecting only the seats that can be selected
const seats = document.querySelectorAll(".row .seats:not(.reserved)");
const count = document.getElementById("count");

let selectedSeatIds = [];

const updateNumberOfSeats = () => {
  const selectedSeats = document.querySelectorAll(".row .seats.selected");

  let numOfSelectedSeats = selectedSeats.length;
  if (
    numOfSelectedSeats ===
    +document.getElementById("numOfTickets").value + 1
  ) {
    alert(
      `You can only select ${document.getElementById("numOfTickets").value}`
    );
    selectedSeats
      .item(+document.getElementById("numOfTickets"))
      .classList.remove("selected");
  }
};

seats.forEach((seat, id) => {
  seat.addEventListener("click", (e) => {
    //only selecting the seats that are not reserved(not having the reserved class)
    if (
      e.target.classList.contains("seats") &&
      !e.target.classList.contains("reserved")
    ) {
      e.target.classList.toggle("selected");
      selectedSeatIds.push(id);
      updateNumberOfSeats();
    }
  });
});
