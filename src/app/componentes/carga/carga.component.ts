import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { AutoService } from 'src/app/servicios/auto.service';

@Component({
  selector: 'app-carga',
  templateUrl: './carga.component.html',
  styleUrls: ['./carga.component.css']
})
export class CargaComponent implements OnInit {
  public formularioIngreso: FormGroup;

  constructor(private autoService: AutoService) { }

  ngOnInit() {
    this.formularioIngreso = new FormGroup({
      modelo: new FormControl('', Validators.required),
      marca: new FormControl('', Validators.required),
      precio: new FormControl('', [Validators.required, Validators.min(0)]),
      puertas: new FormControl('', Validators.required),
      foto: new FormControl('', Validators.required)
    });
  }

  IngresarAuto() {
    let autoAux =  { auto: this.formularioIngreso.value };
    this.autoService.AddAuto(autoAux).subscribe((data: any) => {
      console.log(data);
      if (data.ok) {
        console.log('Cargado');
      }
    });

    this.formularioIngreso.reset();
  }

}
