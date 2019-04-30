import { AutoService } from 'src/app/servicios/auto.service';
import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-borrar',
  templateUrl: './borrar.component.html',
  styleUrls: ['./borrar.component.css']
})
export class BorrarComponent implements OnInit {
  @Input() id: any;
  constructor(private autoService: AutoService) { }

  ngOnInit() {
  }

  BorrarAuto(id: any) {
    console.log(id);
    this.autoService.DeleteAuto(id).subscribe((data: any) => {
      console.log(data);
    });
  }
}
