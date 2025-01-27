package Ejercicio1deClasesyObjetos;

public class Jugador {
	private double Altura;
	private double Prob2;
	private double Prob3;
	
	public Jugador() {
		this.Altura = 1.85;
		this.Prob2 = 40;
		this.Prob3 = 25;
	}
	
	public Jugador(double Altura, double Prob2, double Prob3) {
		this.Altura = Altura;
		this.Prob2 = Prob2;
		this.Prob3 = Prob3;
	}
	
	
	public double getAltura() {
		return Altura;
	}

	public void setAltura(double altura) {
		Altura = altura;
	}
	
	public double getProb2() {
		return Prob2;
	}

	public void setProb2(double prob2) {
		Prob2 = prob2;
	}

	public double getProb3() {
		return Prob3;
	}

	public void setProb3(double prob3) {
		Prob3 = prob3;
	}
	
	public void entrenar_dos(){
		if ((Math.random()*100) <= 50 && this.Prob2 <= 99.5) {
			this.Prob2 += 0.5;
			System.out.println("Entrenamiento de 2 exitoso");
		}else {
			if (this.Prob2 == 100 || this.Prob2 == 100.5) {
				System.out.println("Perfección de 2 alcanzada");
			} else {
			System.out.println("Entrenamiento de 2 fallido");
			}
		}
	}

	public void entrenar_dos(int dias){
		for (int i = dias; i > 0; i--) {
			System.out.print("Dia " + i + ": ");
			if ((Math.random()*100) <= 50 && this.Prob2 <= 99.5) {
				this.Prob2 += 0.5;
				System.out.println("Entrenamiento de 2 exitoso");
			}else {
				if (this.Prob2 == 100) {
					System.out.println("Perfección de 2 alcanzada");
				} else {
				System.out.println("Entrenamiento de 2 fallido");
				}
			}
		}
	}
	
	public void entrenar_tres(){
		if ((Math.random()*100) <= 50 && this.Prob3 <= 99.5) {
			this.Prob3 += 0.5;
			System.out.println("Entrenamiento de 3 exitoso");
		}else {
			if (this.Prob3 == 100) {
				System.out.println("Perfección de 3 alcanzada");
			} else {
			System.out.println("Entrenamiento de 3 fallido");
			}
		}
	}
	
	public void entrenar_tres(int dias){
		for (int i = dias; i > 0; i--) {
			System.out.print("Dia " + i + ": ");
			if ((Math.random()*100) <= 50 && this.Prob3 <= 99.5) {
				this.Prob3 += 0.5;
				System.out.println("Entrenamiento de 3 exitoso");
			}else {
				if (this.Prob3 == 100) {
					System.out.println("Perfección de 3 alcanzada");
				} else {
				System.out.println("Entrenamiento de 3 fallido");
				}
			}
		}
	}

	public boolean lanzar_de_dos() {
		if ((Math.random()*100) <= this.Prob2) {
			System.out.println("Canasta de 2");
			return true;
		}else {
			System.out.println("Tiro de 2 fallado");
			return false;
		}
	}
	
	public boolean lanzar_de_tres() {
		if ((Math.random()*100) <= this.Prob3) {
			System.out.println("Canasta de 3");
			return true;
		}else {
			System.out.println("Tiro de 3 fallado");
			return false;
		}
		
	}
	
}
