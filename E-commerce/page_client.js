const cars = [
  { id: 1, title: "Toyota Corolla", price: 22000, km: 25000, image: "car.jpg", desc: "Automatique, essence" },
  { id: 2, title: "Peugeot 208", price: 17000, km: 40000, image: "car.jpg", desc: "Manuelle, diesel" }
];

function filterCars() {
  const search = document.getElementById("search").value.toLowerCase();
  const price = document.getElementById("price").value;
  const km = document.getElementById("km").value;
  const list = document.getElementById("carList");
  list.innerHTML = "";

  const filtered = cars.filter(car =>
    (!search || car.title.toLowerCase().includes(search)) &&
    (!price || car.price <= parseInt(price)) &&
    (!km || car.km <= parseInt(km))
  );

  filtered.forEach(car => {
    const card = document.createElement("div");
    card.className = "car-card";
    card.innerHTML = `
      <img src="${car.image}" alt="${car.title}">
      <h3>${car.title}</h3>
      <p>${car.desc}</p>
      <p><strong>${car.price} €</strong></p>
      <a href="details.html">Voir détails</a>
    `;
    list.appendChild(card);
  });
}

function simulateCredit() {
  const months = parseInt(document.getElementById("months").value);
  const price = 22000; // Exemple fixe
  const interestRate = 0.04;
  const monthly = (price * (1 + interestRate)) / months;
  document.getElementById("monthlyPayment").innerText = `Mensualité estimée : ${monthly.toFixed(2)} €`;
}
