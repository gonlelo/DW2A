package ejsBásicosAV;

import java.util.Scanner;

public class Factorial {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		double num = 0;
		while (num <= 0 ||  num - (int) num != 0) {   
			System.out.println("Introduzca un número");
			num =scanner.nextDouble();
			if (num > 0 ) {
				if (num - (int) num != 0) {
					System.out.println("Número inválido (El numero de iteraciones debe ser entero)");
				}
				else {
					System.out.println("Número válido");
				}
			}
			else {
				System.out.println("Número inválido (El numero de iteraciones debe mayor que 0)");
			}
		}
		long factorial = (int) num;
		for (int i=(int)num-1; i>0;i--) {
			factorial=factorial*i;
		}
		System.out.print("El factorial de " + num + " es " + factorial);
		scanner.close();
		
	}
}