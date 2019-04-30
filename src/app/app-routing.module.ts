import { MuestraBusquedaComponent } from './componentes/muestra-busqueda/muestra-busqueda.component';
import { MenuComponent } from './componentes/menu/menu.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListadoComponent } from './componentes/listado/listado.component';
import { CargaComponent } from './componentes/carga/carga.component';


const routes: Routes = [
  { path: '', component: MenuComponent },
  { path: 'listado', component: ListadoComponent },
  { path: 'carga', component: CargaComponent },
  { path: 'busqueda', component: MuestraBusquedaComponent },
  { path: '', redirectTo: '/', pathMatch: 'full' },
  { path: '**', redirectTo: '/', pathMatch: 'full'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
