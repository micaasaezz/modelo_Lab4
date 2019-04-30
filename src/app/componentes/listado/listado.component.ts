import { AutoService } from 'src/app/servicios/auto.service';
import { Component, OnInit } from '@angular/core';
import { BorrarComponent } from '../borrar/borrar.component';

@Component({
  selector: 'app-listado',
  templateUrl: './listado.component.html',
  styleUrls: ['./listado.component.css']
})
export class ListadoComponent implements OnInit {
  public lista: any;

  constructor(private autoService: AutoService) {
    this.autoService.TraerAutos().subscribe((data: any) => {
      console.log(data);
      this.lista = data;
    });
  }
  ngOnInit() {
  }
}
