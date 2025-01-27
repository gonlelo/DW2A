package ejsBásicosAV;

import java.util.Scanner;

public class MCDyMCM {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		double num1 = 0.5;
		double num2 = 0.5;
		boolean mcm = false;
		boolean mcd = false;
	
		while((int) num1 != num1 || num1 < 0) {
			System.out.println("Introduce el primer número");
			num1 = scanner.nextDouble();
			if ((int) num1 != num1 || num1 < 0) {
				System.out.println("Debe ser un número entero positivo. Vuelve a intentarlo");
			}
		}
		while((int) num2 != num2 || num2 < 0) {
			System.out.println("Introduce el segundo número");
			num2 = scanner.nextDouble();
			if ((int) num2 != num2 || num2 < 0) {
				System.out.println("Debe ser un número entero positivo. Vuelve a intentarlo");
			}
		}
		
	//MCM
		if (num1 > num2) {
			for (int i= (int) num1; mcm==false; i=i+(int)num1) {
				if (i % num1 == 0 && i % num2 == 0) {
					mcm = true;
					System.out.println("El mínimo común múltiplo de " + (int) num1 + " y " + (int) num2 + " es "+ i);
				}
			}
		}
		else {														//Este solo sirve para optimizar si num2 es mucho mas grande que num1
			for (int i= (int) num2; mcm==false; i=i+(int)num2) {
				if (i % num2 == 0 && i % num1 == 0) {
					mcm = true;
					System.out.println("El mínimo común múltiplo de " + (int) num1 + " y " + (int) num2 + " es "+ i);
				}
			}
		}
		
	//MCD
		if(num1 < num2) {
			for (int i= (int) num1; mcd==false && i > 0; i--) {
				if (num1 % i == 0 && num2 % i == 0) {
					mcd = true;
					if (i != 1) {
						System.out.println("El máximo común divisor de " + (int) num1 + " y " + (int) num2 + " es "+ i);
					}
					else {
						System.out.println("Estos dos números no tienen MCD. Son primos entre si.");
					}
				}
			}
		}
		else {														//Lo mismo
			for (int i= (int) num2; mcd==false && i > 0; i--) {
				if (num2 % i == 0 && num1 % i == 0) {
					mcd = true;
					if (i != 1) {
						System.out.println("El máximo común divisor de " + (int) num1 + " y " + (int) num2 + " es "+ i);
					}
					else {
						System.out.println("Estos dos números no tienen MCD. Son primos entre si.");
					}
				}
			}
		}
		scanner.close();
	}
}

//Hacer todo 2 veces es innecesario. Podria asignar i a una variable y imprimirlo fuera con la mitad de prints.