function dropdown() {
    return {
        open: false,
        show() {
            if (this.open) {
                //Se cierra el menu
                this.open = false;
                //Muestra el scroll de la pagina
                document.getElementsByTagName('html')[0].style.overflow = 'auto'
            } else {
                //Se abre el menu
                this.open = true;
                //Oculta el scroll de la pagina
                document.getElementsByTagName('html')[0].style.overflow = 'hidden'
            }
        },
        close() {
            this.open = false;
            document.getElementsByTagName('html')[0].style.overflow = 'auto'
        }
    }
}