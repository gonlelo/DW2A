package ejsBásicosAV;

import java.util.Scanner;

public class Fibbonacci {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		double num = 0.5;
		long suma = 1;
		long ultNum=1;
		long auxiliar;
		
		while((int) num != num || num < 0) {
			System.out.println("Introduce cuántos términos de la sucesión de Fibbonacci quieres ver");
			num = scanner.nextDouble();
			if ((int) num != num || num < 0) {
				System.out.println("Debe ser un número entero positivo. Vuelve a intentarlo");
			}
		}
		if (num > 0) {
			System.out.print("1 ");
			for (int i = 0; i < num-1; i++) {
				System.out.print(suma + " ");
				auxiliar = suma;
				suma = suma + ultNum;
				ultNum = auxiliar;
			}
		}
		System.out.println("   ¡FIN!");
		scanner.close();
	}
}