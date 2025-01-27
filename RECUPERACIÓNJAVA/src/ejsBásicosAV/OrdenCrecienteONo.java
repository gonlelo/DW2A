package ejsBásicosAV;

import java.util.Scanner;

public class OrdenCrecienteONo {
	public static void main(String[] args)  {
		Scanner scanner = new Scanner(System.in);
		double iteraciones = 1.2;
		
		while (iteraciones <= 1 ||  iteraciones - (int) iteraciones != 0) {      //while (condición) {código}
			System.out.println("¿Con cúantos números quieres hacer la comprobación?");
			iteraciones = scanner.nextDouble();
			if (iteraciones > 1 ) {
				if (iteraciones - (int) iteraciones != 0) {
					System.out.println("Número inválido (El numero de iteraciones debe ser entero)");
				}
				else {
					System.out.println("Número válido");
				}
			}
			else {
				System.out.println("Número inválido (El numero de iteraciones debe mayor que 1)");
			}
		}
		
		
		System.out.println("Introduce un número (1/" + iteraciones + ")");
		double numMayor = scanner.nextDouble();
		boolean Creciente = true;        //Los booleanos se inicializan automáticamente a true
		
		for (int i=2; i <= iteraciones; i++ ) {          //for (definir contador; condición; actualización contador) {código}
			System.out.println("Introduce otro número (" + i + "/"  + iteraciones + ")");
			double numIntroducido = scanner.nextDouble();
			
			if (numIntroducido<numMayor) {
				Creciente = false;
			}
		numMayor = numIntroducido;
		}
		
		if (Creciente) {
			System.out.println("Los números han sido introducidos en orden creciente");
		}
		else {
			System.out.println("Los números NO han sido introducidos en orden creciente");
		}
		scanner.close();
	}
}