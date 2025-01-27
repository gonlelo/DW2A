package ejsBásicosAV;

import java.util.Scanner;

public class KilómetrosMillas {
	public static void main(String[] args) {
		final double factorKmMillaMarina = 1/1.852;
		final double factorKmMillaTerrestre = 1/1.609;
		Scanner scanner = new Scanner(System.in);
		System.out.println("Introduzca los kilómetros que quieres convertir a millas");
		
		double kilómetros = scanner.nextDouble();
		double millasMarinas = kilómetros*factorKmMillaMarina;
		double millasTerrestres = kilómetros*factorKmMillaTerrestre;
		
		System.out.println(kilómetros + " kilómetros equivalen a " + millasMarinas + " millas marinas y " + millasTerrestres + " millas terrestres");
		
		scanner.close();
	}
}