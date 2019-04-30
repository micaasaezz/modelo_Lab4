import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CargaComponent } from './componentes/carga/carga.component';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AutoService } from '../app/servicios/auto.service';
import { ListadoComponent } from './componentes/listado/listado.component';
import { MenuComponent } from './componentes/menu/menu.component';
import { BusquedaComponent } from './componentes/busqueda/busqueda.component';
import { BorrarComponent } from './componentes/borrar/borrar.component';
import { MuestraBusquedaComponent } from './componentes/muestra-busqueda/muestra-busqueda.component';

@NgModule({
  declarations: [
    AppComponent,
    CargaComponent,
    ListadoComponent,
    MenuComponent,
    BusquedaComponent,
    BorrarComponent,
    MuestraBusquedaComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [
    AutoService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
