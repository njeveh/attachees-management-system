

export default () => ({

  toggleNav(e) {
    if(document.getElementById('filterSidenav').style.width > "0px"){
    this.closeNav();
    }else{
      this.openNav();
    }
  },
  openNav() {
      console.log('open nav');
      document.getElementById("filterSidenav").style.width = "250px";
      document.getElementById("home-main").style.marginLeft = "250px";
    },
    
  closeNav() {
      console.log('close nav');
      document.getElementById("filterSidenav").style.width = "0";
      document.getElementById("home-main").style.marginLeft= "0";
    }
});
