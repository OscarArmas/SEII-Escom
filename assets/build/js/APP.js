//Variebles
const formulario = document.getElementById('AgregarUA');
const form = document.getElementById('form');
const listado = document.getElementById ("resumen");
const carrera = document.getElementById("carrera");
const nivel = document.getElementById("nivel");
const ua = document.getElementById("ua");
const confirmar = document.getElementById("Confirmar");
const usu = parseInt(document.getElementById("UID").innerHTML);
let ID= 0 ;
IDMaterias();
let nodos =0;
let valor0 = 0;
let valor1 = 0;               
let DBmat = { };
let Materias = [ ];
let Materia={ };
let Datos = [ ];

 showCustomer("25");
//PruebaJson();
//Clases
class Interfaz{
//Mensaje "Campos vacios"
     Messaje()
     {
          const avisos = document.getElementById('avisos');
            const mensaje = document.getElementById("error"); 
            mensaje.innerHTML = `Campos vacios `;
          
          setTimeout(function(){
             mensaje.innerHTML='';
          },3000);
     };
     //Mensaje "UA repetida"
     Mensaje1()
     {
          const avisos = document.getElementById('avisos');
            const mensaje = document.getElementById("error"); 
            mensaje.innerHTML = `No puedes seleccionar dos veces la misma materia `;
          
          setTimeout(function(){
             mensaje.innerHTML='';
          },3000);
     };
     //Mensaje "7 UA"
     Mensaje2()
     {
          const avisos = document.getElementById('avisos');
            const mensaje = document.getElementById("error"); 
            mensaje.innerHTML = `No puedes seleccionar mas de 7 materias `;
          
          setTimeout(function(){
             mensaje.innerHTML='';
          },3000);
     };
     Mensaje3()
     {
          const avisos = document.getElementById('avisos');
            const mensaje = document.getElementById("error"); 
            mensaje.innerHTML = `No has agregado materias`;
          
          setTimeout(function(){
             mensaje.innerHTML='';
          },3000);
     };
     Mensaje4()
     {
          const avisos = document.getElementById('avisos');
            const mensaje = document.getElementById("error"); 
            mensaje.innerHTML = `Registro confirmado`;
          
          
     };
//agregar valores listado
     agregarListado(nivel, unidad, turno,recurse)
      {
          const UAListado = document.getElementById('lista');
           // Crear un LI
          const li = document.createElement('li');
          // Insertar la materia
          li.innerHTML = `
               ${nivel} - ${unidad} - ${turno} - ${recurse} - <a href="#" class="borrar">x</a><br><br>
          `; 
          // Insertar al HTML
          UAListado.appendChild(li);
     }
    
}
//EventListeners}
//Inser confirmar
confirmar.addEventListener("click",function(e){
   e.preventDefault();
   ui= new Interfaz();
   if( Materias. length == 0 || Materias.length == undefined)
   {
          ui.Mensaje3();
   } else if(Materias.length != 0)
            {
            Materias.forEach(function(mat) {
               IDMaterias();
                const K = mat.unidad;
                const J = mat.nivel;
                const R = mat.turno;
                const V = mat.recurse;
                ID = ID +1; 
                Datos.push(ID);               
                Datos.push(K);
                Datos.push(usu);
                Datos.push(J);                
                Datos.push(V);
                Datos.push(R);
                console.log(Datos);
                    InsertDB(Datos);
                    Datos=[];
                });
                 BorrarLi();
                ui.Mensaje4();
               }
           
});
//LLenar Select
nivel.addEventListener("change",function(e){
     e.preventDefault();
    
     valor1 = nivel.value;

     if (valor0 !="" && valor1 !="")
     {
          BorrarOption();

              for(let i = 0; i<DBmat.length;i++){
                   if(DBmat[i][2]==valor1)
                   {
                          // Crear un option
                         const option = document.createElement('option');
                         option.text =DBmat[i][1] ;
                         option.value = DBmat[i][0];
                         // Insertar al HTML
                         document.getElementById("ua").appendChild(option); 
                     }
        
                   }
                   nodos = ua.childNodes.length;   


     }
});

//carrera. value
carrera.addEventListener("change",function(e){
     valor0 = carrera.value;
});
//eliminar listados
listado.addEventListener("click",function(e){
     e.preventDefault();
     e.target.parentNode.remove();
     let seleccionado = e.target.parentNode.className;
     let pos = Materias.findIndex(CheckUa);
     function CheckUa(Materias){
          return Materias.unidad == seleccionado;
     }
     Materias.splice(pos,1);
     console.log(Materias);
  });
  //Agregar listados
formulario.addEventListener('click',function(e){
     e.preventDefault();

      const Nvl = document.getElementById('nivel').value;
     const Ua = document.getElementById('ua').value;
     const Tur = document .getElementById('turno').value;
     const Rec = document.getElementById("recurse").value;
     const ui= new Interfaz();
     if (Nvl === '' || Ua==='' || Tur===''||Rec==='')
     { 
          ui.Messaje();
     }else{
        
        if((Materias.length)<7)
         {
              let resultado = Materias.find(materio => Materia.unidad ===Ua);
              if(resultado === undefined)
              {
               ui.agregarListado(Nvl,Ua,Tur,Rec);
               Materia={
                           
                           nivel: Nvl,
                           unidad: Ua,
                           turno: Tur,
                           recurse: Rec
                 };
                 Materias.push(Materia);
              }else{
                   ui.Mensaje1();
              }
            console.log(Materias);
       }else{
            ui.Mensaje2();
       }
     }
});
//Borrar options
function BorrarOption(){

          for(let i =1; i<nodos;i++)
               {                
                      ua.lastChild.remove();

               }
               

}
//Borrar li
function BorrarLi(){

     const UAListado = document.getElementById('lista');
     for(let i =1; i<nodos;i++)
          {                
                 UAListado.lastChild.remove();

          }
          

}
//Base de datos
//ID Materas_Alumnos
function IDMaterias() {
     var xhr;
    
     //Crear el objeto 
     xhr = new XMLHttpRequest();
     //abrir una conexion
     xhr.open("GET", "assets/build/js/prueba3.php?", true);
     //Una vez que carga
     //onreadystatechange forma pasada
     //onload forma nueva
     xhr.onreadystatechange= function()
      {
          if (this.readyState == 4 && this.status == 200)
           {
                //this.responsetext contiene la informacion
            ID = parseInt(this.responseText);
          }
      }
     //Enciar el request
     xhr.send();
   }
//Obtener materias
function showCustomer(str) {
     var xhr;
     if (str == "") {
       document.getElementById("error").innerHTML = "";
       return;
     }
     //Crear el objeto 
     xhr = new XMLHttpRequest();
     //abrir una conexion
     xhr.open("GET", "assets/build/js/prueba.php?q="+str, true);
     //Una vez que carga
     //onreadystatechange forma pasada
     //onload forma nueva
     xhr.onreadystatechange= function()
      {
          if (this.readyState == 4 && this.status == 200)
           {
                //this.responsetext contiene la informacion
         // document.getElementById("error").innerHTML = `${this.responseText}`;         
            DBmat = JSON.parse(this.responseText);
           
           console.log(DBmat);         
          }
      }
     //Enciar el request
     xhr.send();
   }
   //Insert DB
   function InsertDB(Datos) {
     var xhr;
     //Crear el objeto 
     xhr = new XMLHttpRequest();
     //abrir una conexion
     xhr.open("GET", "assets/build/js/Prueba2.php?datos= "+Datos, true);
     //Una vez que carga
     //onreadystatechange forma pasada
     //onload forma nueva
     xhr.onreadystatechange= function()
      {
          if (this.readyState == 4 && this.status == 200)
           {
                //this.responsetext contiene la informacion
               console.log(this.responseText);
          }
      }
     //Enciar el request
     xhr.send();
   }
   //Json
   function PruebaJson() {
     var xhr;
    //Crear el objeto 
     xhr = new XMLHttpRequest();
     //abrir una conexion
     xhr.open("GET", "assets/build/js/texto.json", true);
     //Una vez que carga
     //onreadystatechange forma pasada
     //onload forma nueva
     xhr.onload= function()
      {
          if (this.status == 200)
           {
                //this.responsetext contiene la informacion
                
          const personal = JSON.parse(this.responseText);
          let template= "";
          personal.forEach(function(persona){
               template +=`
               <ul>
               <li>Nombre : ${persona.nombre}</li>
               </ul>
               `;     
          });
          document.getElementById("resumen").innerHTML = template;
          }
      }
     //Enciar el request
     xhr.send();
   }
   