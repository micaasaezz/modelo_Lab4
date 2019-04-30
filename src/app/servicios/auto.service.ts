import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AutoService {

  constructor(private httpService: HttpClient) { }

  TraerAutos() {
    // return this.httpService.get('http://192.168.2.31:3003/autos');
    return this.httpService.get('http://localhost/lab4/pp/backend/');
  }
  AddAuto(data: any) {
    // return this.httpService.post('http://192.168.2.31:3003/autos', data);
    return this.httpService.post('http://localhost/lab4/pp/backend', data);
  }
  DeleteAuto(idAux: any) {
    // return this.httpService.delete('http://192.168.2.31:3003/autos/' + idAux);
    return this.httpService.post('http://localhost/lab4/pp/backend/remove', { id: idAux });
  }
}
