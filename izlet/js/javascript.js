
    //Ovde podešavamo da ne učitava ceo sadržaj odjednom, već učitava dodatne postove kako korisnik skroluje
/*    function yHandler() {
      var container = document.querySelector('.container');
      //Visina sadržaja stranice:
      var contentHeight = container.offsetHeight;
      //Vertikalni položaj scroll-a (samo do koje linije je skrolovao korisnik, ne i dno ekrana):
      var yOffset = window.pageYOffset;
      //Da bismo dobili tačan info o tome šta korisnik "vidi", na prethodnu varijablu dodajemo visinu prozora:
      var y = yOffset + window.innerHeight;
      if(y >= contentHeight) {
        //Ajax poziv da se učita dodatni sadržaj:
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //Ovo za sad ne radi, fali par linija koda
              xhttp.open("GET", "dashboard.php", true);
              var return_data = xmlhttp.responseText;
              document.querySelector(".container").innerHTML += return_data;
            }
            xhttp.send();
      }
    }
  };
    window.onscroll = yHandler(); */

    //Toggle na tri tačkice, koji prikazuje dugmad za edit i delete
    function myFunction(id) {
      console.log(document.querySelector('#'+id));
      if (document.querySelector('#'+id).style.display == "none") {
        document.querySelector('#'+id).style.display = "flex";
      } else {
        document.querySelector('#'+id).style.display = "none";
      }
    }

    function GetMap(id) {
      document.querySelector('#bcground-PopUp').style.display='flex';
      document.querySelector('.popupMap').style.display='grid';
      document.getElementById('id').value = id;
    }
    document.getElementById("close4").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupMap').style.display='none';
    });
      document.getElementById("bcground-PopUp").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupMap').style.display='none';
    });

    //Pop-up komentar
    function popupComment(id){
      document.querySelector('#bcground-PopUp').style.display='flex';
      document.querySelector('.popupComment').style.display='grid';
      document.getElementById('id').value = id;
    }
    document.getElementById("close").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupComment').style.display='none';
    });
      document.getElementById("bcground-PopUp").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupComment').style.display='none';
    });

//Pop-up za novi post
    document.getElementById("newPostBtn").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='flex';
      document.querySelector('.popupPost').style.display='grid';
    })
    document.getElementById("close2").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupPost').style.display='none';
    })
    document.getElementById("bcground-PopUp").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupPost').style.display='none';
    })

    //Pop-up za novi post mobilna verzija
        document.getElementById("newPostBtn2").addEventListener('click', function(){
          document.querySelector('#bcground-PopUp').style.display='flex';
          document.querySelector('.popupPost').style.display='grid';
        })
        document.getElementById("close2").addEventListener('click', function(){
          document.querySelector('#bcground-PopUp').style.display='none';
          document.querySelector('.popupPost').style.display='none';
        })
        document.getElementById("bcground-PopUp").addEventListener('click', function(){
          document.querySelector('#bcground-PopUp').style.display='none';
          document.querySelector('.popupPost').style.display='none';
        })

//Edit post-a
    function popupEdit(id){
      //Snima id posta u skriveno polje u formi za edit
      document.getElementById('edit').value = id;
      //Ajax poziv za listanje sadržaja forme iz fajla edit.php
      var ajax = new XMLHttpRequest();
      ajax.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              console.log(ajax.responseText);
              var data = JSON.parse(ajax.responseText);
              renderHTML(data);
            }
            console.log(this.status);
            console.log(this.readyState);

      }
      ajax.open('GET', 'edit.php?edit='+id);
      ajax.send();

      //Ispisivanje rezultata ajax poziva unutar polja forme
      function renderHTML(data){
        for(i = 0; i < data.length; i++) {
          document.querySelector('#title').value = data[i].postheader;
          document.querySelector('#location').value = data[i].postlocation;
          document.querySelector('#transport').option = data[i].transport;
          document.querySelector('#description').value = data[i].postbody;
            if(document.querySelector('#updateImage')) {
              document.querySelector('#edit-img').src = "uploads/"+ data[i].postimage;
            }else{
              document.querySelector('#edit-img').style.visibility = 'none';
            }
          }
        }

      document.querySelector('#bcground-PopUp').style.display='flex';
      document.querySelector('.popupEdit').style.display='grid';
    }
    document.getElementById("close3").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupEdit').style.display='none';
    })
      document.getElementById("bcground-PopUp").addEventListener('click', function(){
      document.querySelector('#bcground-PopUp').style.display='none';
      document.querySelector('.popupEdit').style.display='none';
    })

//Sprečava ponovni unos u bazu pri refresh-u stranice
    if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
     }
