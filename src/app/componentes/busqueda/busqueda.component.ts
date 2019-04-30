import { AutoService } from 'src/app/servicios/auto.service';
import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-busqueda',
  templateUrl: './busqueda.component.html',
  styleUrls: ['./busqueda.component.css']
})
export class BusquedaComponent implements OnInit {
  @Output() cargar = new EventEmitter<any>();

  public modelo: string;
  public lista: Array<any>;
  public respuesta = { encontro: false, item: null};

  constructor(private autoService: AutoService) { }

  ngOnInit() {
    this.autoService.TraerAutos().subscribe((data: Array<any>) => {
      console.log(data);
      this.lista = data;
    });
  }
  BuscarModelo(modelo: string) {
    console.log(modelo);
    /*
      for (const auto of data) {
        // console.log(auto);
        if (auto.modelo === modelo) {
          auxArr.push(auto);
        }
      }
    */
    this.lista.forEach(item => {
      if (item.modelo == modelo) {
        this.respuesta.encontro = true;
        this.respuesta.item = item;
        this.cargar.emit(this.respuesta);
      }
    });
  }
}
