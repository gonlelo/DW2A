package ejsBásicosAV;

import java.util.Scanner;

public class PrecioBillete {
	public static void main(String[] args) {
	 
		final double precioKM = 8.5;
		Scanner scanner = new Scanner(System.in);
	 
		System.out.println("Introduzca la distancia a recorrer en kilómetros (ida y vuelta)");
		double distancia = scanner.nextDouble();
		System.out.println("Introduzca los dias de estancia");
		int estancia = scanner.nextInt();
	 
		double precio = distancia*precioKM;
	 
		//Descuento
		if (distancia > 1000 && estancia > 7) {     //if (condición) {  código  }       && (AND)          || (OR)
			precio = precio*0.7;
		}
	 
		System.out.println("El precio de tus billetes será de " + precio + " pesetas");
	 
		scanner.close();
	}
}