const text = document.querySelector(".text-anim");

        const textLoad = () => {
            setTimeout(() => {
            text.textContent = "programmer.";
        }, 0);
        setTimeout(() => {
            text.textContent = "web developer.";
        }, 4000);
    }

textLoad();
setInterval(textLoad, 12000);