package ejsBásicosAV;

import java.util.Scanner;

public class NumPrimo {
	public static void main(String[] args ) {
		Scanner scanner= new Scanner(System.in);
		double num;
		int contDivis = 0;
		
		System.out.println("Intoduce un número entero y te diré si es primo");
		num = scanner.nextDouble();
		if ((int) num == num) {
			if (num<0) {num=-num;}
			for (int i = 1; i<=num; i++) {
				if (num % i == 0) {
					contDivis++;
				}
			}
		}
		else {System.out.println("El número debe ser entero");}
		
		if (contDivis > 2 || num == 0 || num == 1) {
			System.out.println("El " + (int) num + " no es primo");
		}
		else {
			System.out.println("El " + (int) num + " es primo");
		}
		scanner.close();
	}
}