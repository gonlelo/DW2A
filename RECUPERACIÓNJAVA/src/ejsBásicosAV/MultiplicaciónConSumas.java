package ejsBásicosAV;

import java.util.Scanner;

public class MultiplicaciónConSumas {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		double num1;
		double num2;
		
		for (int i=0; i<10;i++) {
			System.out.println("Introduce el primer número"); 
			num1 = scanner.nextDouble();
			System.out.println("Introduce el segundo número"); 
			num2 = scanner.nextDouble();
			if ((int) num1-num1 == 0) {                    //Si el número es entero
				System.out.print((int) num2 + "*" + (int) num1 + " = " + (int) num1);
			if (num1>=0) {                                 //Si el número es positivo
				for (int j=1; j<num2; j++) {
					System.out.print("+" + (int) num1);
				}
			}
			if (num1<0) {                                 //Si el número es negativo
				for (int j=1; j<num2; j++) {
					System.out.print((int) num1);
				}
			}
			}
			
			if ((int) num1-num1 != 0) {                    //Si el número no es entero
				System.out.print(num2 + "*" + (int) num1 + "=" + num1);
			if (num1>=0) {                                 //Si el número es positivo
				for (int j=1; j<num2; j++) {
					System.out.print("+" + num1);
				}
			}
			if (num1<0) {                                 //Si el número es negativo
				for (int j=1; j<num2; j++) {
					System.out.print(num1);
				}
			}
			}
			double resultado=num1*num2;
			System.out.println(" = " + resultado);
		}
		System.out.println("¡Ya está!");
		scanner.close();
	}
}


//No es perfecto pero sta bien