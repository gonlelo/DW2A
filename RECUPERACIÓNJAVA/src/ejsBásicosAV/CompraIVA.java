package ejsBásicosAV;

import java.util.Scanner;

public class CompraIVA {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		final double IVA = 1.12;
		System.out.println("Introduce el precio del artículo");
		float precioArt = scanner.nextFloat();
		System.out.println("Introduce el nº de productos a adquirir");
		int unidades = scanner.nextInt();
		double precio = unidades * precioArt * IVA;
		
		if (precio > 50000) {
			precio = 0.95*precio;
		}
		
		System.out.println("El precio del pedido es de " + precio + " pesetas");
		
		scanner.close();
	}
}