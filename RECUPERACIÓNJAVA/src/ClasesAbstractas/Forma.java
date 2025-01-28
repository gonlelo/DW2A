package ClasesAbstractas;

//Clase abstracta: Forma
abstract class Forma {
 // Método abstracto: calcular el área (las subclases deben implementarlo)
 public abstract double calcularArea();

 // Método concreto: descripción común
 public void descripcion() {
     System.out.println("Soy una forma geométrica.");
 }
}

//Subclase: Círculo
class Circulo extends Forma {
 private double radio;

 // Constructor
 public Circulo(double radio) {
     this.radio = radio;
 }

 @Override
 public double calcularArea() {
     return Math.PI * radio * radio;
 }
}

//Subclase: Rectángulo
class Rectangulo extends Forma {
 private double ancho;
 private double alto;

 // Constructor
 public Rectangulo(double ancho, double alto) {
     this.ancho = ancho;
     this.alto = alto;
 }

 @Override
 public double calcularArea() {
     return ancho * alto;
 }
}