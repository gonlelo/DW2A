package ejsBásicosAV;

import java.util.Scanner;

public class VolumenCilindro  {
	public static void main(String[] args) {
		System.out.println("Introduce la altura del cilindro");
		Scanner scannerh =new Scanner(System.in);
		double altura = scannerh.nextDouble();
		
		System.out.println("Introduce el radio del cilindro");
		Scanner scannerr =new Scanner(System.in);
		double radio = scannerr.nextDouble();
		
		double superficie = 2*Math.PI*radio*altura;  //Utilizo Math.PI (de la clase Math que se importa automaticamente ya que pertenece al paquete java.lang). Math.PI es un campo estático* de la clase Math.
		double volumen = Math.PI*Math.pow(radio, 2)*altura;   //Utilizo Math.pow. Math.pow es un método estático** de la clase Math ya descrita.
		
		System.out.println("La superficie de un cilindro con radio " + radio + " y altura " + altura + " es " + superficie + " unidades cuadradas");
		System.out.println("El volumen de un cilindro con radio " + radio + " y altura " + altura + " es " + volumen + " unidades cúbicas");
		
		scannerh.close();
		scannerr.close();
	}
}
/*Un campo estático en Java es una variable de una clase que pertenece a la clase en su totalidad, en lugar de a instancias individuales de esa clase. 
Esto significa que el campo estático es compartido por todas las instancias de la clase y se puede acceder directamente a través del nombre de la clase,
en lugar de a través de una instancia específica de la clase.


**Math.pow no es un campo estático, sino un método estático de la clase Math. Un método estático es un método que pertenece a la clase en su totalidad, 
en lugar de a instancias individuales de esa clase. Esto significa que puedes llamar a un método estático directamente a través del nombre de la clase, 
sin necesidad de crear una instancia de la clase.*/