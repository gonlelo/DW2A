package ClasesAbstractas;

//Clase principal
public class MainAnimal {
public static void main(String[] args) {
   // No se puede instanciar la clase abstracta
   // Animal animal = new Animal(); // Esto da error

   // Crear objetos de las subclases
   Animal perro = new Perro();
   Animal gato = new Gato();

   // Llamar a métodos
   perro.hacerSonido(); // ¡Guau, guau!
   gato.hacerSonido();  // ¡Miau, miau!

   // Método concreto de la clase abstracta
   perro.dormir(); // Zzz...
   gato.dormir();  // Zzz...
}
}