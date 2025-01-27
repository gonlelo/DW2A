package ejsBásicosAV;

import java.util.Scanner;

public class MediaPosNeg {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		double num = 1;
		double sumaPos = 0;
		double sumaNeg = 0;
		while (num!=0) {
			System.out.println("Introduzca un número. Introduzca 0 para acabar.");
			num=scanner.nextDouble();
			if (num>0) {
				sumaPos=sumaPos+num;
			}
			else {
				sumaNeg=sumaNeg+num;
			}
		}	
		System.out.println("Suma de positivos: " + sumaPos);
		System.out.println("Suma de negativos: " + sumaNeg);
		scanner.close();
	}
}