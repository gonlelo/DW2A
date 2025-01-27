package ejsBásicosAV;

import java.util.Scanner;

public class QuéDecena {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		int decena;
		
		for (int i = 1; i < 11; i++) {
			System.out.println(i + ")   Introduce un número del 1 al 49");
			double num = scanner.nextDouble();
			
			if ((int) num == num) {
				if (num<=49 && num>=1) {
					decena = (int) num/10;
					System.out.println("El número " + num + " pertenece a la decena del " + decena);	
				}
				else {System.out.println("El número debe estar entre 1 y 49"); i--;}
			}
			else {System.out.println("El número debe ser entero"); i--;}
		}
		System.out.println("¡Se acabó!");
		scanner.close();
	}
}