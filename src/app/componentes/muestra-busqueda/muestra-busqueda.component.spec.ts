import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MuestraBusquedaComponent } from './muestra-busqueda.component';

describe('MuestraBusquedaComponent', () => {
  let component: MuestraBusquedaComponent;
  let fixture: ComponentFixture<MuestraBusquedaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MuestraBusquedaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MuestraBusquedaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
