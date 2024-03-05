//inicialização das variaveis
const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      sidebarClose = document.querySelector(".siderbarClose"),
      footer = document.querySelector("footer"); // Selecionando o elemento footer

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark-mode") {
    body.classList.add("dark");
    footer.classList.add("dark"); // Adicionando a classe "dark" ao footer se o modo escuro estiver ativado
}

// codigo para ativar o dark e light mode
modeToggle.addEventListener("click" , () => {
    modeToggle.classList.toggle("active");
    body.classList.toggle("dark");
    footer.classList.toggle("dark"); // Alternando a classe "dark" do footer junto com o modo

    // codigo para manter o modo dark ou light ativado mesmo depois do refresh
    if (!body.classList.contains("dark")) {
        localStorage.setItem("mode" , "light-mode");
    } else {
        localStorage.setItem("mode" , "dark-mode");
    }
});

// codigo para abrir a slidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});

body.addEventListener("click" , e => {
    let clickedElm = e.target;

    if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
        nav.classList.remove("active");
    }
});

const downloadButton = document.getElementById('download-button');
        downloadButton.addEventListener('click', () => {
            const link = document.createElement('a');
            link.href = 'CV.pdf';
            link.download = 'CV.pdf';
            link.click();
        });

