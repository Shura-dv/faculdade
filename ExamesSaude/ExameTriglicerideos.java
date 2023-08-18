package main.java.Exames;

import java.util.Scanner;

public class ExameTriglicerideos extends Exame {
    private double quantidadeTriglicerideos;

    public ExameTriglicerideos(String nome, String tipoSanguineo, int anoNascimento) {
        super(nome, tipoSanguineo, anoNascimento);
    }

    @Override
    public void calcularResultado() {
        if (anoNascimento <= 9) {
            if (quantidadeTriglicerideos < 75) {
                resultado = "Ótimo - Triglicerídeos: " + quantidadeTriglicerideos;
            } else {
                resultado = "Elevado - Triglicerídeos: " + quantidadeTriglicerideos;
            }
        } else if (anoNascimento <= 19) {
            if (quantidadeTriglicerideos < 90) {
                resultado = "Ótimo - Triglicerídeos: " + quantidadeTriglicerideos;
            } else {
                resultado = "Elevado - Triglicerídeos: " + quantidadeTriglicerideos;
            }
        } else {
            if (quantidadeTriglicerideos < 150) {
                resultado = "Ótimo - Triglicerídeos: " + quantidadeTriglicerideos;
            } else {
                resultado = "Elevado - Triglicerídeos: " + quantidadeTriglicerideos;
            }
        }
    }

    @Override
    public void mostrarResultado() {
        System.out.println("Resultado do Exame de Triglicerídeos:");
        super.mostrarResultado();
        System.out.println();
    }

    @Override
    public void cadastrarExame(Scanner scanner) {
        System.out.print("Informe a quantidade de triglicerídeos em mg/dL: ");
        quantidadeTriglicerideos = scanner.nextDouble();
        calcularResultado();
    }
}
