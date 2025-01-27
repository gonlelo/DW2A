package ejsBásicosAV;

import java.util.Scanner;

public class SumaPares {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		double suma = 0;
		
		for(int i=0; i<=56;i++) {

			if (i % 2 == 0 && i != 0) {
				System.out.println(i + " PAR");
				suma = suma + i;
			}
			else {
				System.out.println(i);
			}
		}
		System.out.println("La suma de los pares es " + suma);
		scanner.close();
	}
}