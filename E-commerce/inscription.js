document.getElementById("signupForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const fullname = document.getElementById("fullname").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;

  if (password !== confirmPassword) {
    alert("Les mots de passe ne correspondent pas.");
    return;
  }

  const userData = {
    fullname,
    email,
    phone,
    password,
  };

  // Exemple POST vers API
  fetch("https://votre-api.com/register", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(userData)
  })
    .then(response => response.json())
    .then(data => {
      alert("Compte créé avec succès !");
      // redirection si besoin
      // window.location.href = "/dashboard";
    })
    .catch(error => {
      console.error("Erreur :", error);
      alert("Erreur lors de la création du compte.");
    });
});

