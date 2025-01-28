package ClasesAbstractas;

//Clase abstracta
abstract class Animal {
 // Método abstracto: no tiene cuerpo
 public abstract void hacerSonido();

 // Método concreto: tiene cuerpo
 public void dormir() {
     System.out.println("Zzz...");
 }
}

//Subclase 1: Perro
class Perro extends Animal {
 @Override
 public void hacerSonido() {
     System.out.println("¡Guau, guau!");
 }
}

//Subclase 2: Gato
class Gato extends Animal {
 @Override
 public void hacerSonido() {
     System.out.println("¡Miau, miau!");
 }
}

//Intentar crear un objeto de Animal dará error porque es abstracta.
