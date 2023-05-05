<script>
	import { onMount } from 'svelte';

	/**
	 * @type {any[]}
	 */
	let data = [];

	onMount(async () => {
		const res = await fetch('http://localhost:8080/news-api/');
		console.log(await res);
		var json = JSON.parse(await res.json());
		data = json.articles;
	});
</script>

<main>
	<h1>Guardian of the news</h1>
	<h3>Stay in, stay around!!</h3>
	<!-- Card para cada noticia -->
	{#each data as notice}
		<div class="card">
			<div class="headerNotice">
				{notice.title}
			</div>
			<div class="bodyNotice">
				<div class="texts">
					<p>
						{notice.description}
					</p>
					<span>
						{#if notice.author == null}
							Unknow Author
							{:else}
							By {notice.author}
						{/if}
					</span>
				</div>
				<img src={notice.urlToImage} alt="Imagem" />
			</div>
		</div>
	{/each}
</main>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	main {
		margin-top: 2rem;
		min-height: 100vh;
		display: flex;
		flex-direction: column;
		align-items: center;
		font-family: 'Archivo', sans-serif;
	}

	img {
		max-width: 20rem;
		border-radius: 10px 0px 10px 0px;
	}

	.card {
		max-width: 60%;
		display: flex;
		flex-direction: column;
		gap: 1rem;
		text-align: center;
		margin-top: 4rem;
		padding-top: 1rem;
		padding-left: 1rem;

		background: rgba(255, 255, 255, 0);
		box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.37);
		backdrop-filter: blur(20px);
		-webkit-backdrop-filter: blur(20px);
		border-radius: 10px;
		border: 1px solid rgba(255, 255, 255, 0.18);
	}

	.headerNotice {
		font-size: 16pt;
		font-weight: 500;
	}

	.bodyNotice {
		display: flex;
		align-items: center;
		text-align: start;
		gap: 1rem;
		line-height: 1.5rem;
	}

	.texts {
		display: flex;
		flex-direction: column;
		gap: 2rem;
	}

	span {
		font-weight: 500;
		color: #5a5a5a;
	}
</style>
