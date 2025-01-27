package Ejercicio1deClasesyObjetos;

public class Main {
	public static void main(String[] args) {
		Jugador jugador1 = new Jugador();
		Jugador jugador2 = new Jugador(1.76, 10, 5);
		
		jugador1.entrenar_dos(10);
		jugador1.entrenar_tres(10);
		
		jugador2.entrenar_dos(10);
		jugador2.entrenar_tres(10);
		
		while (jugador1.getProb2() < 65) {
			jugador1.entrenar_dos();
		}
		
		while (jugador1.getProb3() < 45) {
			jugador1.entrenar_tres();
		}
		
		while (jugador2.getProb2() <= 65) {
			jugador2.entrenar_dos();
		}
		
		while (jugador2.getProb3() <= 45) {
			jugador2.entrenar_tres();
		}
		
		int contador2 = 0;
		int contador3 = 0;
		
		while (contador2 < 10) {
			if (jugador1.lanzar_de_dos()) {
				contador2++;
				System.out.println("Lleva " + contador2 + " canastas de 2");
			}
		}
		while (contador3 < 4) {
			if (jugador1.lanzar_de_tres()) {
				contador3++;
				System.out.println("Lleva " + contador3 + " canastas de 3");
			}
		}
		contador2 = 0;
		contador3 = 0;
		
		while (contador2 < 10) {
			if (jugador2.lanzar_de_dos()) {
				contador2++;
				System.out.println("Lleva " + contador2 + " canastas de 2");
			}
		}
		while (contador3 < 4) {
			if (jugador2.lanzar_de_tres()) {
				contador3++;
				System.out.println("Lleva " + contador3 + " canastas de 3");
			}
		}
		
	}
}