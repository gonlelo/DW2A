package ejsBásicosAV;

import java.util.Scanner;

public class SumaRestaMenú {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		System.out.println("Introduce el primer número");
		double num1 = scanner.nextDouble();
		System.out.println("Introduce el segundo número");
		double num2 = scanner.nextDouble();
		System.out.println("¿Suma o resta? (S/R)");
		String sumaResta = "Turtles all the way down";
		double resultado = 0;
		
		while (!sumaResta.equals("R") && !sumaResta.equals("S")) {      //NO COMPARAR CON == O != STRINGS
			sumaResta = scanner.next();									//USAR .equals()
			if (sumaResta.equals("S")) {
				resultado = num1 + num2;
			}
			else if (sumaResta.equals("R")) {
				resultado = num1 - num2;
			}
			else {
				System.out.println("Comando no reconocido, inténtalo de nuevo");
			}
		}
		if (sumaResta.equals("S")) {
			System.out.println(num1 + " + " + num2 + " = " + resultado);
		}
		else {
			System.out.println(num1 + " - " + num2 + " = " + resultado);
		}
		scanner.close();
	}
}