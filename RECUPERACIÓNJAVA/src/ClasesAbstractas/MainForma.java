package ClasesAbstractas;

//Clase principal
public class MainForma {
public static void main(String[] args) {
   // Crear un círculo y un rectángulo
   Forma circulo = new Circulo(5);
   Forma rectangulo = new Rectangulo(4, 6);

   // Calcular áreas
   System.out.println("Área del círculo: " + circulo.calcularArea()); // 78.54
   System.out.println("Área del rectángulo: " + rectangulo.calcularArea()); // 24.0

   // Usar el método concreto
   circulo.descripcion(); // Soy una forma geométrica.
}
}