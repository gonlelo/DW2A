package ejsBásicosAV;

import java.util.Scanner;

public class MenúVentasImpuestos {
	public static void main(String[] args) {
		final double precioHamburguesa = 500;
		final double precioCerveza = 150;
		final double precioCocaCola = 175;
		final double precioEnsalada = 200;
		final double precioSalchichas = 275;
		final double precioRefrescos = 200;
		final double precioSopa = 260;
		final double precioPastel = 300;
		double ingresos = 0;
		
		Scanner scanner = new Scanner(System.in);
		
		System.out.println("Introduce el número de hamburguesas vendidas");
		double unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioHamburguesa;
		System.out.println("Introduce el número de cervezas vendidas");
		unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioCerveza;
		System.out.println("Introduce el número de Coca-Colas vendidas");
		unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioCocaCola;
		System.out.println("Introduce el número de ensaladas vendidas");
		unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioEnsalada;
		System.out.println("Introduce el número de salchichas vendidas");
		unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioSalchichas;
		System.out.println("Introduce el número de refrescos vendidos");
		unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioRefrescos;
		System.out.println("Introduce el número de sopas vendidas");
		unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioSopa;
		System.out.println("Introduce el número de pasteles vendidos");
		unidades = scanner.nextDouble();
		ingresos = ingresos + unidades*precioPastel;
		
		double impuestos = ingresos*0.12;
		
		System.out.println("El total de ingesos es de " + ingresos + " pesetas. Hay que pagar " + impuestos + " pesetas en impuestos");
		scanner.close();
		
	}
}