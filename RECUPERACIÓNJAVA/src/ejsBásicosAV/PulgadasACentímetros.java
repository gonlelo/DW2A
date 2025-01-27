package ejsBásicosAV;

import java.util.Scanner;   //Importación de la clase Scanner proporcionada por Java en el paquete java.util (permite leer datos de firentes fuentes)

public class PulgadasACentímetros {   

	public static void main(String[] args) {    
		

		System.out.println("Introduzca centímetros");   //Salida por consola mediante el método println y el objeto System.out de la clase PrintStream con la conversión
		
		Scanner scanner = new Scanner(System.in); //Declaración de la variable scanner de tipo Scanner y asignación a (y creación de) un objeto de la clase Scanner con argumento System.in (objeto de la clase abstracta InputStream diseñada para leer bytes de una variedad de fuentes (en el caso específico de System.in del teclado)
		double centímetros = scanner.nextDouble(); //Declaración de la variable centímetros y asignación de un valor introducido por teclado con el método nextDouble y el objeto scanner de la clase Scanner (paquete java.util)
		
		
		double pulgadas = centímetros/2.54; //Declaración de la variable pulgadas y asignación del factor de conversión
		
		System.out.println(centímetros + " centímetros son " + pulgadas + " pulgadas"); 
		
		scanner.close();   //Cierra el recurso. Buena práctica.
	}
}