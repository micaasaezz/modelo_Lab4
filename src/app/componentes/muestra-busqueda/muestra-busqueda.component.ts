import { BusquedaComponent } from './../busqueda/busqueda.component';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-muestra-busqueda',
  templateUrl: './muestra-busqueda.component.html',
  styleUrls: ['./muestra-busqueda.component.css']
})
export class MuestraBusquedaComponent implements OnInit {
  public lista: Array<any> = null;

  constructor() { }

  ngOnInit() {
  }

  public cargar(auto: any) {
    this.lista = auto.item;
    console.log("auto en el mostrar busqueda");
    console.log(auto);
  }
}
