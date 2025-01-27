package ejsBásicosAV;

import java.util.Scanner;

public class Ecuación2ºGrado {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		System.out.println("Introduce la 'a' de la ecuación de segundo grado (ax^2+2bx+c)");
		double a = scanner.nextDouble();
		System.out.println("Introduce la 'b' de la ecuación de segundo grado (ax^2+2bx+c)");
		double b = scanner.nextDouble();
		System.out.println("Introduce la 'c' de la ecuación de segundo grado (ax^2+2bx+c)");
		double c = scanner.nextDouble();
		
		double solución1 = (-b + Math.sqrt(Math.pow(b, 2)-4*a*c))/(2*a);
		double solución2 = (-b - Math.sqrt(Math.pow(b, 2)-4*a*c))/(2*a);
		
		if (solución1 == solución2) {
			System.out.println("La solución de la ecuación " + a + "x^2+" + "2" + b + "x+" + c + " es" + solución1);
		}
		else {
			System.out.println("Las soluciones de la ecuación " + a + "x^2+" + "2" + b + "x+" + c + " son " + solución1 + " y " + solución2);
		}

		scanner.close();
	}
}

//NO FUNCIONA CUANDO NO HAY SOLUCIONES (DISCRIMINANTE < 0)