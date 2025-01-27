package ejsBásicosAV;

import java.util.Scanner;

public class CambioDivisas {
	public static void main(String args[]) {
		
		//Chelines Austriacos a pesetas
		System.out.println("Introduce la cantidad de Chelines Austriacos que quieres convertir a pesetas");
		Scanner scanner = new Scanner(System.in);
		double chelines = scanner.nextDouble();
		double factorChelinPesetas = 956.871/100;
		double pesetas = chelines*factorChelinPesetas;
		System.out.println(chelines + " chelines equivalen a " + pesetas + " pesetas");
		
		//Dracmas Griegas a Francos Franceses
		System.out.println("Introduce la cantidad de Dracmas Griegas que quieres convertir a Francos Franceses");
		double dracmas = scanner.nextDouble();
		double factorDracmaPesetas = 88.607/100;
		double factorFrancofranPesetas = 20.110/1;
		double francos= dracmas*factorDracmaPesetas/factorFrancofranPesetas;
		System.out.println(dracmas + " dracmas equivalen a " + francos + " Francos Franceses");
		
		//Pesetas a Dólares y Liras Italianas
		System.out.println("Introduce la cantidad de pesetas que quieres convertir a Dólares y Liras Italianas");
		pesetas = scanner.nextDouble();
		double factorDólarPesetas = 122.499/1;
		double factorLiraitPesetas = 9.289/100;
		double dólares = pesetas/factorDólarPesetas;
		double librasit = pesetas/factorLiraitPesetas;
		System.out.println(pesetas + " pesetas equivalen a " + dólares + " dólares y a " + librasit + " libras italianas");
		
		scanner.close();
	}	
}

//Cuidado con cerrar un scanner y luego usar otro, no se puede porque System.in se cierra con el scanner.