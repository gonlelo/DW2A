package ejsBásicosAV;

import java.util.Scanner;

public class PrecioLlamada {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		System.out.println("Introduzca el tiempo de la llamada en minutos");
		double tiempo = scanner.nextDouble();
		double precio;
		final int tarifaInicial = 10;
		
		if (tiempo > 3) {
			precio = tarifaInicial + (tiempo-3)*5;
		}
		else {											//if(condición)  {código} else {código}
			precio = tarifaInicial;
		}
		
		System.out.println("La llamada te va a costar " + precio + " pesetas");
		
		scanner.close();
	}
}